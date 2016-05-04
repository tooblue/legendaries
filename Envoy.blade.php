@servers(['production' => 'serverpilot@diamond.legendaries.net'])

@task('deploy', ['on' => 'production'])
    cd ~/apps/legendaries
    php artisan down
    git pull origin master
    composer install --no-dev
    composer update --no-dev
    php artisan migrate
    php artisan up
@endtask
