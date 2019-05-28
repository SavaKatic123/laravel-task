# Adding tasks

There are two directories in this repository: `task` and `solution`.

Put the entire task, including a `README.md` file with task description, `devskiller.json` 
[project descriptor](https://help.devskiller.com/creating-tasks-and-tests/using-custom-programming-tasks/programming-task-project-descriptor). 
The project in the task directory also has to contain candidate tests (visible to the candidate; see `CalculatorTest.java` 
in the example below), as well as verification tests (not visible to the candidate; see `IllegalArgumentsTest.java` and 
`RandomNumbersTest.java` in the example below). The verification tests directory and names need to match the patterns 
specified in `devskiller.json`.
 
The build executed against the sources from the task directory must end in `TEST_FAILURE`, i.e., the 
the code should compile, but there should be failing tests since the task remains to be solved.

You may find more information regarding developing tasks for the Devskiller platform in the [documentation](https://help.devskiller.com/creating-tasks-and-tests#using-custom-programming-tasks)

The `solution` directory must **only** include the files that the candidate should modify while solving the task,
along with the corresponding directory structure. These files should contain the changes necessary to solve the task.

For example, if your task (within the `task` directory) has the following structure:

```
+--devskiller.json
+--README.md
+--.gitignore
+--src
|   +--main
|      +--java
|         +--com
|            +--devskiller
|               +--calculator
|                  +--Calculator.java
|                  +--InputVerifier.java
|   +--test
|      +--java
|         +--com
|            +--devskiller
|               +--calculator
|                  +--CalculatorTest.java
|      +--verify_pack
|         +--IllegalArgumentsTest.java
|         +--RandomNumbersTest.java   		
 
```
and the candidate should only change `Calculator.java` file in order to solve the test, in that case, the
`solution` directory should include only the following:

```
+--src
|   +--main
|      +--java
|         +--com
|            +--devskiller
|         	 +--calculator
|                   +--Calculator.java
```
As opposed to the `Calculator.java` file from the `task` directory, the `Calculator.java` file in the `solution` 
directory should contain the correct implementation.

During the task verification process, our platform will substitute the source code files from the with missing 
implementation from the `task` directory with fully implemented source code files from the `solution` directory. 
After we make this change and run the build, we expect it to end in `PASSED` as all the tests should pass upon 
implementation of the solution. 

Pushing anything to `master` will cause an automated verification process to be triggered. If there are any problems, there 
will be issues logged in GitLab. If the build passes, there will be a comment added under your commit stating that the 
verification has passed. Also, some comments with logs from the build executions during the verification process will be 
added to the commit.

