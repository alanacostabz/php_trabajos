<?php



// require_once 'app/Models/Job.php';
// require_once 'app/Models/Project.php';
// require_once 'app/Models/Printable.php';

//require_once 'lib1/Project.php';

use App\Models\{Job, Project};

$jobs = Job::all();
$projects = Project::all();
// $job1 = new Job('PHP Developer', 'This is an awesome job!!!');
// $job1->months = 16;

// $job2 = new Job('Python Developer', 'This is an awesome job!!!');
// $job2->months = 4;

// $job3 = new Job('Devops', 'This is an awesome job!!!');
// $job3->months = 32;

//$project1 = new Project('Project 1', 'Description');

//$projectLib = new Lib1\Project();


// $jobs = [
//     $job1,
//     $job2,
//     $job3
// ];

// $projects = [
//     $project1
// ];

// $jobs = [
//     [
//         'title' => 'PHP Developer',
//         'description' => 'This is an awesome job!!!',
//         'visible' => true,
//         'months' => 16
//     ],
//     [
//         'title' => 'Python Dev',
//         'description' => '',
//         'visible' => false,
//         'months' => 14
//     ],
//     [
//         'title' => 'Devops',
//         'description' => '',
//         'visible' => false,
//         'months' => 5
//     ],
//     [
//         'title' => 'Node Dev',
//         'description' => '',
//         'visible' => true,
//         'months' => 24
//     ],
//     [
//         'title' => 'Frontend Dev',
//         'description' => '',
//         'visible' => true,
//         'months' => 3
//     ]
// ];




function printElement($job)
{
    // if ($job->visible == false) {
    //     return;
    // }
    echo '<li class="work-position">';
    echo '<h5>' . $job->title . '</h5>';
    echo '<strong>' . $job->description . '</strong>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
}
