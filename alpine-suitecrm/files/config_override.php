<?php
  if(null !== $$installer_defaults) {
    $$installer_defaults['setup_db_host_name']            = $_ENV['DB_PORT_3306_TCP_ADDR'] . ':3306';
    $$installer_defaults['setup_db_database_name']        = $_ENV['DB_NAME'];
    $$installer_defaults['setup_db_admin_user_name']      = $_ENV['DB_USER'];
    $$installer_defaults['setup_db_admin_password']       = $_ENV['DB_PASS'];
    $$installer_defaults['db_type']                       = $_ENV['DB_TYPE'];
  }

  if(null !== $$sugar_config) {
    $$sugar_config['dbconfig']['db_port']       = $_ENV['3306'];
    $$sugar_config['dbconfig']['db_manager']    = $_ENV['DB_MANAGER'];
    $$sugar_config['dbconfig']['db_name']       = $_ENV['DB_NAME'];
    $$sugar_config['dbconfig']['db_host_name']  = $_ENV['DB_PORT_3306_TCP_ADDR'];
    $$sugar_config['dbconfig']['db_user_name']  = $_ENV['DB_NAME'];
    $$sugar_config['dbconfig']['db_password']   = $_ENV['DB_PASS'];
  }
?>
