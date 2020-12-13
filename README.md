# Misa Form M2 Module

### Install
- `bin/magento enable:module Misa_Form`
- `bin/magento setup:static-content:deploy Misa_Form`
- `bin/magento setup:upgrade`
- add new connection **mi** to your env.php file and create db **mi**

### Cron
- `bin/magento cron:run --group=miform`

### Endpoints
- Admin Forms - ***misa_form/form/****
- Admin Countries - ***misa_form/country/****

### Update Country List
- by cron job **misa_form_countrylist**
- manually using **"Update"** button in Country grid
