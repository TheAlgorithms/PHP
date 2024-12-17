<?php

namespace NeuralNetworks\PerceptronClassifier;

/**
 * This class implements a simple neural network with one hidden layer and one output neuron.
 * The network uses the sigmoid activation function and performs binary classification.
 * (https://cw.fel.cvut.cz/b211/courses/be5b33rpz/labs/07_perceptron/start)
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class NeuralNetworkPerceptronClassifier
{
    /**
     * @param array $X
     * @param array $Y
     * @param int $iterations
     * @param float $learningRate
     * @return array
     */
    public function trainModel(array $X, array $Y, int $iterations, float $learningRate): array
    {
        [$W, $b] = $this->initParams(count($X));

        for ($i = 0; $i < $iterations; $i++) {
            // Forward propagation
            $A = $this->forwardPropagation($X, $W, $b);

            // Compute cost
            $cost = $this->computeCost($A, $Y);

            // Backward propagation
            [$dW, $db] = $this->backwardPropagation($A, $X, $Y);

            // Update parameters
            [$W, $b] = $this->updateParams($W, $b, $dW, $db, $learningRate);

            if ($i % 100 == 0) {
                echo "Iteration {$i} - Cost: {$cost}\n";
            }
        }

        return [$W, $b];
    }

    /**
     * @param array $X
     * @param array $W
     * @param float $b
     * @return array
     */
    public function predict(array $X, array $W, float $b): array
    {
        $A = $this->forwardPropagation($X, $W, $b);
        return array_map(fn($a) => $a > 0.5 ? 1 : 0, $A);
    }

    /**
     * Stage 1. Prepare dataset
     * @return array[]
     */
    public function generateTrainingSet(): array
    {
        $m = 50;

        // Generate a 2 x m matrix with binary values (0 or 1)
        $X = [];
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $X[$i][$j] = rand(0, 1);
            }
        }

        // Compute Y: Logical AND condition (X[0] == 1 and X[1] == 0)
        $Y = [];
        for ($j = 0; $j < $m; $j++) {
            $Y[$j] = ($X[0][$j] == 1 && $X[1][$j] == 0) ? 1 : 0;
        }

        return [$X, $Y];
    }

     /**
      * Stage 2. Initialize model parameters
      * @param int $n Number of features
      * @return array [$W, $b] Weight and bias arrays
      */
    private function initParams(int $n): array
    {
        $W = [];
        for ($i = 0; $i < $n; $i++) {
            $W[$i] = mt_rand() / mt_getrandmax(); // Small random values
        }
        $b = 0.0; // Bias initialized to zero
        return [$W, $b];
    }

    /**
     * Sigmoid Activation Function
     * @param float $z
     * @return float
     */
    private function sigmoid(float $z): float
    {
        return 1 / (1 + exp(-$z));
    }

    /**
     * Stage 3. Forward Propagation
     * @param array $X
     * @param array $W
     * @param float $b
     * @return array
     */
    private function forwardPropagation(array $X, array $W, float $b): array
    {
        $Z = [];
        for ($j = 0; $j < count($X[0]); $j++) {
            $sum = $b;
            for ($i = 0; $i < count($W); $i++) {
                $sum += $W[$i] * $X[$i][$j];
            }
            $Z[$j] = $this->sigmoid($sum);
        }
        return $Z;
    }

    /**
     * Stage 4. Compute Cost Function (Binary Cross-Entropy Loss)
     * @param array $A
     * @param array $Y
     * @return float
     */
    private function computeCost(array $A, array $Y): float
    {
        $m = count($Y);
        $cost = 0.0;
        for ($i = 0; $i < $m; $i++) {
            $cost += -($Y[$i] * log($A[$i]) + (1 - $Y[$i]) * log(1 - $A[$i]));
        }
        return $cost / $m;
    }

    /**
     * Stage 5. Backward Propagation
     * @param array $A
     * @param array $X
     * @param array $Y
     * @return array
     */
    private function backwardPropagation(array $A, array $X, array $Y): array
    {
        $m = count($Y);
        $dW = array_fill(0, count($X), 0.0);
        $db = 0.0;

        for ($j = 0; $j < $m; $j++) {
            $dZ = $A[$j] - $Y[$j];
            for ($i = 0; $i < count($X); $i++) {
                $dW[$i] += $dZ * $X[$i][$j];
            }
            $db += $dZ;
        }

        // Average gradients
        for ($i = 0; $i < count($dW); $i++) {
            $dW[$i] /= $m;
        }
        $db /= $m;

        return [$dW, $db];
    }

    /**
     * STage 6. Update Parameters
     * @param array $W
     * @param float $b
     * @param array $dW
     * @param float $db
     * @param float $learningRate
     * @return array
     */
    private function updateParams(array $W, float $b, array $dW, float $db, float $learningRate): array
    {
        for ($i = 0; $i < count($W); $i++) {
            $W[$i] -= $learningRate * $dW[$i];
        }
        $b -= $learningRate * $db;

        return [$W, $b];
    }
}
