# Contributing guidelines

## Before contributing

Welcome to [TheAlgorithms/PHP](https://github.com/TheAlgorithms/PHP)! Before sending your pull requests, make sure that you **read the entire guide**. If you have any question about the contributing guide, please feel free to [state it clearly in an issue](https://github.com/TheAlgorithms/PHP/issues/new) or ask the community in [Gitter](https://gitter.im/TheAlgorithms).

## Contributing

### Contributor

We are very happy that you would consider contributing! As a contributor, you agree and confirm that:

- You did your work - no plagiarism allowed
  - Any plagiarized work will not be merged
- Your work will be distributed under [MIT License](LICENSE) once your pull request is merged
- Your submitted work follows (or mostly follows) the styles and standards already found in this repo

**New implementations** are welcome! For example, new solutions for an existing problem, different representations for a graph data structure or an algorithm design with different complexity.

**Improving comments** and **writing proper tests** are also highly welcome.

### Contribution

We appreciate any contribution, from fixing a grammar mistake in a comment to implementing complex algorithms. Please read this section if you are contributing your work.

Please help us keep our issue list small by adding fixes: #{$ISSUE_NO} to the commit message of pull requests that resolve open issues. GitHub will use this tag to auto close the issue when the PR is merged.

#### What is an Algorithm?

An Algorithm is one or more functions (or classes) that:
* take one or more inputs,
* perform some internal calculations or data manipulations,
* return one or more outputs,
* have minimal side effects (Ex. print(), plot(), read(), write()).

Algorithms should be packaged in a way that would make it easy for readers to put them into larger programs.

Algorithms should:
* have intuitive class and function names that make their purpose clear to readers
* use PHP naming conventions and intuitive variable names to ease comprehension
* be flexible to take different input values
* have PHP type hints for their input parameters and return values
* raise PHP exceptions (UnexpectedValueException, etc.) on erroneous input values
* have docstrings with clear explanations and/or URLs to source materials
* contain doctests that test both valid and erroneous input values
* return all calculation results instead of printing or plotting them

Algorithms in this repo should not be how-to examples for existing PHP packages.  Instead, they should perform internal calculations or manipulations to convert input values into different output values.  Those calculations or manipulations can use data types, classes, or functions of existing PHP packages but each algorithm in this repo should add unique value.

#### Coding Style

We want your work to be readable by others; therefore, we encourage you to note the following:

- Please write in PHP 7.1+
- Please put thought into naming of functions, classes, and variables.  Help your reader by using __descriptive names__ that can help you to remove redundant comments
  - Single letter variable names are _old school_ so please avoid them unless their life only spans a few lines
  - Please follow the [PHP Basic Coding Standard](https://www.php-fig.org/psr/psr-1/) so functionNames should be camelCase, CONSTANTS in UPPER_CASE, Name\Spaces and ClassNames should follow an "autoloading" PSR, etc.

- Original code submission require docstrings or comments to describe your work

- More on docstrings and comments:

  If you used a Wikipedia article or some other source material to create your algorithm, please add the URL in a docstring or comment to help your reader

- Write tests
- Avoid importing external libraries for basic algorithms. Only use them for complicated algorithms

#### Other Standard While Submitting Your Work

- File extension for code should be `.php` 
- After adding a new File/Directory, please make sure to update the [DIRECTORY.md](DIRECTORY.md) file with the details.
- If possible, follow the standard *within* the folder you are submitting to
- If you have modified/added code work, make sure the code compiles before submitting
- If you have modified/added documentation work, ensure your language is concise and contains no grammar errors
- Add a corresponding explanation to [Algorithms-Explanation](https://github.com/TheAlgorithms/Algorithms-Explanation) (Optional but recommended).

- Most importantly,
  - **Be consistent in the use of these guidelines when submitting.**
  - **Join** [Gitter](https://gitter.im/TheAlgorithms) **now!**
  - Happy coding!

Writer [@darwinz](https://github.com/darwinz), Aug 2020 (based on [TheAlgorithms/Python](https://github.com/TheAlgorithms/Python/blob/master/CONTRIBUTING.md) by [@poyea](https://github.com/poyea))
