# FP PPL - Elearning App
1. Firstly, install dependencies needed by the php.
   ```
   composer install
   ```
3. Then configure the environment variables by renaming ```env``` file to ```.env```. This step is optional, but if the environment variables are not set, the project will try to connect to a local database. If you wish to use local database instead, the script for tables and seeds are provided in the ["seed_script.sql"](./seed_script.sql) file.
4. Deploy the project locally
   ```
   php spark serve
   ```
