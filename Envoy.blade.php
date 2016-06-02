@servers(['production' => 'serverpilot@diamond.legendaries.net', 'localhost' => '127.0.0.1']])

@macro('deploy')
    down
    update
    rsync
    up
@endmacro

@task('up', ['on' => 'production'])
    cd ~/apps/legendaries
    php artisan up
@endtask

@task('down', ['on' => 'production'])
    cd ~/apps/legendaries
    php artisan down
@endtask

@task('update', ['on' => 'production'])
    cd ~/apps/legendaries
    git pull origin master
    composer install --no-dev
    composer update --no-dev
    php artisan migrate
@endtask

@task('rsync', ['on' => 'localhost'])
    gulp --production
    rsync -azP public/js serverpilot@diamond.legendaries.net:~/apps/legendaries/public
    rsync -azP public/css serverpilot@diamond.legendaries.net:~/apps/legendaries/public
@endtask

@task('init', ['on' => 'localhost'])
    php artisan key:generate
    composer install
    composer update
    npm install --no-bin-links
    npm update --no-bin-links
    php artisan migrate --seed
@endtask
