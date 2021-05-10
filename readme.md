## We need 
    Php, Composer, mySQL, Laravel

## Before run
    cp .env.example .env
    edit .env
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cake
    DB_USERNAME=root
    DB_PASSWORD=
    
## Set up
    $ cd final
    $ composer install
    $ php artisan key:generate

## Fix file
    final/vendor/inani/larapoll/src/traits/PollWriteResults.php
    
       
          */
    public function drawResult(Poll $poll)
    {   
        $total = $poll->votes->count();
        .........
        */
        ======>
        ----------------
    public function drawResult($id)
    {   
        $poll = Poll::find($id);
        $total = $poll->votes->count();
        .............
        */
        
## Run
    php artisan serv
    
## User Admin
    bang98ptit@gmail.com/111111
    
## DB
    create new schema
        name: cake
        Default Characterset : utf8mb4
        Default collation utf8mb_0900_ai_ci
        
    