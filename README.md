# athena-olxph
### Pre-requisite/s software installed
1. Git
3. Docker <br>
```Above mentioned pre-requisite/s should be already installed when you already work with athena-olxph test automation project. No need to install again.```

### Athena Installation Steps
1. Clone athena repo to your home directory: <br>
```$ git clone https://github.com/athena-oss/athena.git``` <br>
``` - go to athena root dir using terminal (ex. cd athena/)``` <br>
``` execute ./athena init ``` <br>
``` - Follow the ATHENA instruction to make ATHENA global``` <br>
``` - Restart your terminal ``` <br>
<b>OR Add following to bash_profile</b><br>
```a. $ vi ~/.bash_profile``` (Mac User) , ```vi ~/.bashrc``` (Linux User) <br>
```b. add the following at the end of line``` <br>
      ```export ATHENA_HOME=/<installation location>/athena``` <br>
      ```export PATH=${PATH}:$ATHENA_HOME```
2. Execute again ```$ athena init``` under athena project to check if athena is properly installed
3. Install the following plugins under athena project <br>
<b>PROXY:</b> ```$ ./athena plugins install proxy https://github.com/athena-oss/plugin-proxy.git``` <br>
<b>SELENIUM:</b> ```$ ./athena plugins install selenium https://github.com/athena-oss/plugin-selenium.git``` <br>
<b>PHP:</b> ```$ ./athena plugins install php https://github.com/athena-oss/plugin-php.git```<br>
4. Start proxy plugin
```$ ./athena proxy start```
5. Start selenium-hub
```$ ./athena selenium start hub <version>```
6. Start selenium-node multiple instances
```$ ./athena selenium start chrome-debug <version> -p 6003-6004:5900 --instances=2 -it```
7. Clone athena-olxph <br>
```$ git clone https://github.com/olxphilippines/athena-olxph.git```
8. Create new folder named "<b>Reports</b>" in project root folder
9. Run a bdd test<br>
```
$ ./athena php bdd ../athena-olxph ../athena-olxph/athena.json --browser=chrome
  
  run specific test:
  add @tags
  
$ ./athena php bdd ../athena-olxph ../athena-olxph/athena.json --browser=chrome --tags=@login

  parallel-run
  
$ ./athena php bdd ../athena-olxph/ ../athena-olxph/athena.json --browser=chrome --parallel-process=2
```   
<b>Added parameters to avoid page-crash in chrome docker instance</b>
```
  athena selenium start chrome-debug 3.1 -p 6001-6002:5900 --instances=2 --env DBUS_SESSION_BUS_ADDRESS=/dev/null -v /dev/shm:/dev/shm -t -d -P
```  
Usage
```
./athena php bdd <tests-directory> <config-file> [<options>...] [<behat-options>...]
  
      <tests-directory>                   This directory will be mounted inside the docker container. Behat will be executed inside this directory
      <config-file>                       Athena config file, with proxy configurations, grid options, etc
      [--browser=<name>]                  Browser name to be used. Such as firefox, phantomjs, or chrome
      [--parallel-process=<number>]       Number of scenarios, of a single feature, to be ran in parallel
      [--parallel-features=<number>]      Number of features to be ran in parallel. This can be used with --parallel-process to achieve the best results
      [--php-version=<version>]           Switch between available PHP versions. E.g. --php-version=7.0
      [--override-athena-dependencies]    Override PHP plugin dependencies with the ones found inside the tests directory
      [--restore-athena-dependencies]     Restore PHP plugin original dependencies
  
  You can also use the following athena flags :
      --athena-dbg                                     Enables the debug mode.
      --athena-env=<name|file_with_environment_config> Specifies the environment to be used.
      --athena-dns=<nameserver_ip>                     Specifies which nameserver will be used in the container.
      --athena-no-logo                                 Suppresses the logo.
      
   ```
   <table>
    <tr align=center>
        <td><b>Buying</td>
        <td><b>Selling</td>
    </td>
    <tr>
        <td  valign=top>
            <table>
                <tr align=center>
                    <td>
                        <b>Feature Name
                    </td>
                    <td>
                        <b>Tag/s Available
                    </td>
                </tr>
                  <tr align=center>
                      <td>
                          Homepage
                      </td>
                      <td>
                          @homepage,@searching
                      </td>
                  </tr>
                <tr align=center>
                    <td>
                        Ad Listing
                    </td>
                    <td>
                        @adlisting,@searching
                    </td>
                </tr>  
                <tr align=center>
                    <td>
                        Ad Details
                    </td>
                    <td>
                        @addetails,@searching
                    </td>
                </tr>                               
                <tr align=center>
                    <td>
                        Registration
                    </td>
                    <td>
                        @registration
                    </td>
                </tr>
                <tr align=center>
                    <td>
                        Login
                    </td>
                    <td>
                        @login
                    </td>
                </tr>
               <tr align=center>
                   <td>
                       Top Up
                   </td>
                   <td>
                       @TopUp
                   </td>
               </tr>
               <tr align=center>
                   <td>
                       Vas Refresh
                   </td>
                   <td>
                       @VasRefresh
                   </td>
               </tr> 
               <tr align=center>
                   <td>
                       Vas Schedule Refresh
                   </td>
                   <td>
                       @VasScheduleRefresh <code>(Removed)</code>
                   </td>
               </tr>
               <tr align=center>
                  <td>
                      Buy Now
                  </td>
                  <td>
                      @buynow <code>(Removed)</code>
                  </td>
               </tr>  
            </table>
        </td>
        <td valign=top>
            <table>
                <tr align=center>
                    <td>
                        <b>Feature Name
                    </td>
                    <td>
                        <b>Tag/s Available
                    </td>
                </tr>
                  <tr align=center>
                      <td>
                          Ad Management
                      </td>
                      <td>
                          @TopUp, @VasRefresh, @AdBoostingPackage
                      </td>
                  </tr>
                <tr align=center>
                    <td>
                        Messages
                    </td>
                    <td>
                        n/a
                    </td>
                </tr>  
                <tr align=center>
                    <td>
                        Chat
                    </td>
                    <td>
                        n/a
                    </td>
                </tr>                               
                <tr align=center>
                    <td>
                        Ad Posting
                    </td>
                    <td>
                        @sellform
                    </td>
                </tr>
                <tr align=center>
                    <td>
                        Settings
                    </td>
                    <td>
                        n/a
                    </td>
                </tr>
                <tr align=center>
                    <td>
                        User Management
                    </td>
                    <td>
                        n/a
                    </td>
                </tr>
                <tr align=center>
                    <td>
                        Tracking
                    </td>
                    <td>
                        @adsenselisting, @adsensedetails, @audienceSegments
                    </td>
                </tr>                                                                                   
            </table>
        </td>
    </tr> 
   </table>
   Current Running for Regression: (with 3 chrome-nodes running with PHP7.1-CLI)
   
   ```
   athena php --php-version=7.1 bdd ../athena-olxph ../athena-olxph/athena.bdd.prod.json --browser=chrome --tags=@login,@registration,@homepage,@adlisting,@addetails,@TopUp,@VasRefresh,@sellform,@buynow --parallel-process=2 --parallel-features=2
   ```
   
   Misc: <br>
   Pre-requisite/s:
    <br>1. Atlas is already installed in local machine. <a href="https://github.com/naspersclassifieds-shared/atlas-web-development-environment">Github link</a>
    <br>2. Oneweb os already installed in local machine. <a href="https://github.com/olxphilippines/oneweb-ofb">Github link</a>
    <br>3. Laradock is already installed in Oneweb project directory
   <br><b>Starting Atlas using terminal</b>
   <ul>
    <li> Go to Atlas root directory
    <li> Execute command "atlas start full"
   </ul>
   <b>Starting Oneweb using terminal with laradock</b>
   <br><font color="red">Laradock is already installed</font>
   <ul>
    <li> Go to laradock under Oneweb project dir
    <li> Execute command "sudo docker-compose up -d nginx" 
   </ul>
  <b>Laradock installation</b>
  
    - cd oneweb-ofb
    - git submodule add https://github.com/LaraDock/laradock.git
    - cd laradock
    - sed -i 's/Dockerfile-70/Dockerfile-56/g' docker-compose.yml
  
  <b>Updating local copy of Oneweb using git + terminal</b>
   
    - open terminal
    - go to Oneweb project root directory
    - execute command "git pull origin master"
    - execute command "gulp --production"
    
  <ul>
   <li><b>PhantomJs Version</b> - <a href="https://hub.docker.com/r/akeem/selenium-node-phantomjs/tags/">Click Me!</a>
   <li><b>Selenium Hub and Nodes Version</b> - <a href="https://hub.docker.com/u/selenium/">Click Me!</a>
