<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Student Information Form</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" required>
            </div>
            <div class="form-group">
                <label for="fatherName">Father's Name:</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="schoolName">School Name:</label>
                <input type="text" class="form-control" id="schoolName" name="schoolName" required>
            </div>
            <div class="form-group">
                <label for="principalName">Principal Name:</label>
                <input type="text" class="form-control" id="principalName" name="principalName" required>
            </div>
            <div class="form-group">
                <label for="game">Select Game:</label>
                <select class="form-control" id="game" name="game">
                   <option value="Tug of War">Tug of War</option>
                    <option value="Volleyball">Volleyball</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Hockey">Hockey</option>
                    <option value="Kho Kho">Kho Kho</option>
                    <option value="Table Tennis">Table Tennis</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Judo">Judo</option>
                    <option value="Handball">Handball</option>
                    <option value="Kabadi">Kabadi</option>
                    <option value="Athletics">Athletics</option>
                    <!-- Add more game options here -->
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category">
                    <option value="Under 14">Under 14</option>
                    <option value="Under 18">Under 18</option>
                    <!-- Add more category options here -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- PHP Code to Display Data and Delete Button -->
        <?php
        session_start();

        // Initialize the student data array if it doesn't exist
        if (!isset($_SESSION['student_data'])) {
            $_SESSION['student_data'] = array();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Store submitted data in a session variable
            $_SESSION['student_data'][] = $_POST;
        }

        // Check if the delete button was clicked
        if (isset($_POST['delete'])) {
            // Clear all data in the session
            $_SESSION['student_data'] = array();
        }

        if (!empty($_SESSION['student_data'])) {
            echo "<h2>Student Information</h2>";
            echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
            echo "<table class='table'>";
            echo "<thead><tr><th>Student Name</th><th>Father's Name</th><th>Date of Birth</th><th>Gender</th><th>Mobile</th><th>Email</th><th>School Name</th><th>Principal Name</th><th>Game</th><th>Category</th></tr></thead>";
            echo "<tbody>";

            foreach ($_SESSION['student_data'] as $student) {
                echo "<tr>";
                echo "<td>{$student['studentName']}</td>";
                echo "<td>{$student['fatherName']}</td>";
                echo "<td>{$student['dob']}</td>";
                echo "<td>{$student['gender']}</td>";
                echo "<td>{$student['mobile']}</td>";
                echo "<td>{$student['email']}</td>";
                echo "<td>{$student['schoolName']}</td>";
                echo "<td>{$student['principalName']}</td>";
                echo "<td>{$student['game']}</td>";
                echo "<td>{$student['category']}</td>";
                echo "</tr>";
            }

            // echo "</tbody></table>";
            // echo "<button type='submit' name='delete' class='btn btn-danger'>Delete All Data</button>";
            // echo "</form>";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>