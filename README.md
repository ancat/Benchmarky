Benchmarky
==========

Most existing Python modules for sending HTTP requests are extremely
Benchmarky is a small static class that makes benchmarking multiple
operations at the same time really easy. Most benchmarking classes
require creating some type of benchmarking object per each operation
you would like to keep track of. Not with benchmarky!

It has a cool name, too!

The general idea is each operation being benchmarked has its own key.
Timer organizes the keys on its own, so all you have to do is start
and stop the Timer, just using the key name. 

::

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


This produces the following output:

::

    Results for md5: 5000 tests; Max: 5.793571472168E-5; Min: 2.8610229492188E-6; Avg: 3.762674331665E-6; Total: 0.018813371658325
    Results for sha1: 5000 tests; Max: 0.00011992454528809; Min: 2.8610229492188E-6; Avg: 4.1135787963867E-6; Total: 0.020567893981934


The results are all available in Timer::$results, so you can display the data as you see fit.
