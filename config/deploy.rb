# Add values from .env
require 'dotenv'
Dotenv.load

set :application, ENV['APP_NAME']
set :repo_url, ENV['REPO_URL']
set :branch, -> { `git rev-parse --abbrev-ref HEAD`.chomp }
set :log_level, :debug
set :linked_files, %w{.env web/.htaccess}
set :linked_dirs, %w{web/app/uploads}
set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

namespace :deploy do
  # Install composer to shared-path
  after :starting, 'composer:install_executable'
end
