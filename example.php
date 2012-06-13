<?PHP
    require_once 'Timer.php';

    for($i = 0; $i < 5000; $i++) {

        // Measure performance of md5()
        Timer::start('md5');
        md5('Password' . $i);
        Timer::stop('md5');

        // Measure performance of sha1()
        Timer::start('sha1');
        sha1('Password' . $i);
        Timer::stop('sha1');
    }

    // Print a nice overview of results
    Timer::prettyPrint();
?>
