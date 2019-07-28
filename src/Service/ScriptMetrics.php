namespace App\Service;

class Scriptmetrics {

    public function test()
    {
        $messages = [
            'one',
            'two',
            'three',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }

    public function linesPerActor($body) {
        $lines = preg_split("/^/$actor_name.*$/", "$body");
        $lines_per_actor = count($lines);
        return $lines_per_actor;
        //this might process the text multiple times :/ need to be more specific 
        //this is where your regex should go for # of lines, something like /^/$actor_name.*$/
    }

    //words per actor 
    public function wordsPerActor($body) {
        return 'it does a thing';
    }

    //mentions per actor #todo
    public function mentionsPerActor($body) {
        return 'it does a thing here too';
        //using regex something like /^/$actor_name.*$/
    }

    //movies per year
    public function moviesPerYear() {
        return 'it does a thing one';
        //something #todo
    }

    //fails per year
    public function failsPerYear() {
        return 'it does a thing two';
        //something #todo
    }







}