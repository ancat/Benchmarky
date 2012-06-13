<?PHP
    class Timer {
        public static $results = array();

        public static function start($key) {
            if (array_key_exists($key, self::$results)) {
                self::$results[$key]['tests']++;
                self::$results[$key]['start'] = microtime(true);
            } else {
                self::$results[$key] = array('tests' => 1, 'start' => microtime(true), 'max' => 0, 'min' => 0, 'total' => 0, 'average' => 0, 'results' => array());
            }
        }

        public static function stop($key) {
            $time = microtime(true);
            $elapsed = $time - self::$results[$key]['start'];
            self::$results[$key]['results'][] = $elapsed;
            self::$results[$key]['total'] += $elapsed;
            self::$results[$key]['average'] = self::$results[$key]['total'] / self::$results[$key]['tests'];
            if (self::$results[$key]['max'] < $elapsed) {
                self::$results[$key]['max'] = $elapsed;
            }

            if (self::$results[$key]['min'] > $elapsed || self::$results[$key]['min'] == 0) {
                self::$results[$key]['min'] = $elapsed;
            }
        }

        public static function prettyPrint() {
            foreach(self::$results as $key=>$test) {
                echo "Results for $key: $test[tests] tests; Max: $test[max]; Min: $test[min]; Avg: $test[average]; Total: $test[total]\n";
            }
        }
    }
?>
