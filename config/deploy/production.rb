set :tmp_dir, ENV['PRODUCTION_FOLDER'] + '/.tmp'
set :stage, :production
set :branch, :master
set :deploy_to, -> { ENV['PRODUCTION_FOLDER'] }

# Run composer from our custom location
SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

# Ask for passwd
ask(:password, nil, echo: false)
server ENV['PRODUCTION_SERVER'], user: ENV['PRODUCTION_USER'], port: 22, password: fetch(:password), roles: %w{web app db}

fetch(:default_env).merge!(wp_env: :production)
