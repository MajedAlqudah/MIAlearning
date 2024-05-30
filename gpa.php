<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("header.php"); ?>

<div class="container clearfix"></div>
<!-- Page Sub Menu
		============================================= -->
		<div id="page-menu">
			<div id="page-menu-wrap">
			</div>
		</div><!-- #page-menu end -->
        <?php
                $gpaMessage = '';
                $totalGPAMessage = '';
                $numCourses = isset($_POST['numCourses']) ? intval($_POST['numCourses']) : 0;

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['calculateGPA'])) {
                        $totalCredits = 0;
                        $totalGradePoints = 0;

                        for ($i = 0; $i < $numCourses; $i++) {
                            $hours = intval($_POST['course' . ($i + 1)]);
                            $grade = floatval($_POST['grade' . ($i + 1)]);

                            if ($hours <= 0) {
                                echo "<script>alert('Please enter valid values for Course " . ($i + 1) . ".');</script>";
                                break;
                            }

                            $totalCredits += $hours;
                            $totalGradePoints += $hours * $grade;
                        }

                        if ($totalCredits > 0) {
                            $gpa = number_format($totalGradePoints / $totalCredits, 2);
                            $gpaMessage = "<h3>Your GPA is: $gpa</h3>";
                        }
                    }

                    if (isset($_POST['calculateTotalGPA'])) {
                        $currentGPA = floatval($_POST['currentGPA']);
                        $passedHours = intval($_POST['passedHours']);
                        $totalMajorHours = intval($_POST['totalMajorHours']);

                        if ($currentGPA < 0 || $currentGPA > 4.2 || $passedHours < 0 || $totalMajorHours <= 0) {
                            echo "<script>alert('Please enter valid values for current GPA, passed hours, and total major hours.');</script>";
                        } else {
                            $totalCredits = $passedHours;
                            $totalGradePoints = $currentGPA * $passedHours;

                            for ($i = 0; $i < $numCourses; $i++) {
                                if (isset($_POST['course' . ($i + 1)])) {
                                    $hours = intval($_POST['course' . ($i + 1)]);
                                    $grade = floatval($_POST['grade' . ($i + 1)]);

                                    if ($hours <= 0) {
                                        echo "<script>alert('Please enter valid values for Course " . ($i + 1) . ".');</script>";
                                        break;
                                    }

                                    $totalCredits += $hours;
                                    $totalGradePoints += $hours * $grade;
                                }
                            }

                            if ($totalCredits > 0) {
                                $totalGPA = number_format($totalGradePoints / $totalCredits, 3);
                                $totalGPAMessage = "<h3>Your Total GPA is: $totalGPA</h3>";
                            }
                        }
                    }
                }
                ?>


    
    <title>GPA Calculator</title>
    <link rel="stylesheet" href="styles.css">

    <div class="containe">
                    <h2 class="gpa">GPA Calculator</h2>
                    <div class="input-section">
                        <form method="post" action="">
                            <label for="numCourses">Number of Courses:</label>
                            <input type="number" id="numCourses" name="numCourses" min="1" placeholder="Enter number of courses you have this semester" required>
                            <button type="submit" name="generateForm" class="bt">Enter</button>
                        </form>
                    </div>
                    <?php if (isset($_POST['generateForm']) && $numCourses > 0): ?>
                        <div id="coursesForm">
                            <form method="post" action="">
                                <?php for ($i = 0; $i < $numCourses; $i++): ?>
                                    <div class="course">
                                        <label for="course<?php echo $i + 1; ?>">Course <?php echo $i + 1; ?>:</label>
                                        <input type="number" id="course<?php echo $i + 1; ?>" name="course<?php echo $i + 1; ?>" min="1" placeholder="Hours" required>
                                        <select id="grade<?php echo $i + 1; ?>" name="grade<?php echo $i + 1; ?>">
                                            <option value="4.2">A+</option>
                                            <option value="4">A</option>
                                            <option value="3.75">A-</option>
                                            <option value="3.5">B+</option>
                                            <option value="3.25">B</option>
                                            <option value="3">B-</option>
                                            <option value="2.75">C+</option>
                                            <option value="2.5">C</option>
                                            <option value="2.25">C-</option>
                                            <option value="2">D+</option>
                                            <option value="1.75">D</option>
                                            <option value="1.5">D-</option>
                                            <option value="0.5">F</option>
                                        </select>
                                    </div>
                                <?php endfor; ?>
                                <input type="hidden" name="numCourses" value="<?php echo $numCourses; ?>">
                                <button type="submit" name="calculateGPA" class="bt">Calculate GPA</button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($gpaMessage)): ?>
                        <div id="result"><?php echo $gpaMessage; ?></div>
                    <?php endif; ?>
                </div>

                <div class="containe">
                    <div class="input-section">
                        <form method="post" action="">
                            <label for="currentGPA">Current GPA:</label>
                            <input type="number" id="currentGPA" name="currentGPA" step="0.01" min="0" max="4.2" placeholder="Enter your GPA" required>
                            <label for="passedHours">Passed Hours:</label>
                            <input type="number" id="passedHours" name="passedHours" min="0" placeholder="Enter number of passed hours" required>
                            <label for="totalMajorHours">Total Major Hours:</label>
                            <input type="number" id="totalMajorHours" name="totalMajorHours" min="0" placeholder="Enter total major hours" required>
                            <button type="submit" name="calculateTotalGPA" class="bt">Calculate Total GPA</button>
                            <?php if ($numCourses > 0): ?>
                                <?php for ($i = 0; $i < $numCourses; $i++): ?>
                                    <input type="hidden" name="course<?php echo $i + 1; ?>" value="<?php echo isset($_POST['course' . ($i + 1)]) ? $_POST['course' . ($i + 1)] : ''; ?>">
                                    <input type="hidden" name="grade<?php echo $i + 1; ?>" value="<?php echo isset($_POST['grade' . ($i + 1)]) ? $_POST['grade' . ($i + 1)] : ''; ?>">
                                <?php endfor; ?>
                                <input type="hidden" name="numCourses" value="<?php echo $numCourses; ?>">
                            <?php endif; ?>
                        </form>
                    </div>

                    <?php if (!empty($totalGPAMessage)): ?>
                        <div id="totalGPA"><?php echo $totalGPAMessage; ?></div>
                    <?php endif; ?>
                </div>
            


<?php include("footer.php"); ?>