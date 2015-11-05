<?php
  if(null !== $$installer_defaults) {
    $$installer_defaults['setup_db_host_name']            = $_ENV['DB_PORT_3306_TCP_ADDR'];
    $$installer_defaults['setup_db_database_name']        = $_ENV['database_name'];
    $$installer_defaults['setup_db_admin_user_name']      = $_ENV['db_user_name'];
    $$installer_defaults['setup_db_admin_password']       = $_ENV['db_password'];
    $$installer_defaults['db_type']                       = $_ENV['db_type'];
  }

  if(null !== $$sugar_config) {
    $$sugar_config['dbconfig']['db_port'] = $_ENV['3306'];
    $$sugar_config['dbconfig']['db_manager'] = $_ENV['db_manager'];
    $$sugar_config['dbconfig']['db_host_name'] = $_ENV['DB_PORT_3306_TCP_ADDR'];
    $$sugar_config['dbconfig']['db_user_name'] = $_ENV['db_user_name'];
    $$sugar_config['dbconfig']['db_password'] = $_ENV['db_password'];
  }
?>
