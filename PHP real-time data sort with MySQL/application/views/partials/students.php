<div id="students">
<?php
if (count($results) == 9) {
?>
    <h1>All Students</h1>
<?php
} else {
?>
    <h1><?= count($results); ?> Students</h1>
<?php
}
?>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Course Enrolled</th>
            </tr>
        </thead>
<?php 
foreach($results as $result){
?>        
        <tr>
            <td><?=$result['id']?></td>
            <td><?=$result['first_name']." ".$result['last_name']?></td>
            <td><?=$result['gender']?></td>
            <td><?=$result['course']?></td>
        </tr>
<?php 
}  
?>
    </table>
</div>