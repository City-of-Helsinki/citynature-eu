set :stage, :staging
set :deploy_to, -> { ENV['STAGING_FOLDER'] }

# Run composer from our custom location
SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

# Ask for passwd
ask(:password, nil, echo: false)
server ENV['STAGING_SERVER'], user: ENV['STAGING_USER'], port: 22, password: fetch(:password), roles: %w{web app db}

fetch(:default_env).merge!(wp_env: :staging)

namespace :deploy do

  after :finishing, :restart

  # Restart nginx / Apache if root priviledges & not on shared hosting
  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      execute "sudo service php5-fpm restart"
      execute "sudo service nginx restart"
    end
  end
end
