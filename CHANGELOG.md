## CHANGELOG


### Developer pre release (v. 0.3.0)

#### New rules added:
- First letter in uppercase ('`example text.`' -> '`Example text.`');
- Replace dash ('`-`' -> '`—`').

#### Docker composer

Was added base docker compose config for build locally.  
_To run it locally_:
- Make an `.env` file from example:  
  ```shell
  cp .env.example .env
  ```  
  Change IP in this file to available on your host machine;
- Make a build and run:
  ```shell
  docker-compose up -d
  ```
