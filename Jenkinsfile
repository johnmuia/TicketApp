pipeline {
    agent { label 'Jenkins-node' }
    /* Slave resembles the server on which the job will be build on */
    stages {
         stage('Clone repository') {
             
             steps {
                 sh 'bash ./deploy.sh'
         /* Let's make sure we have the repository cloned to our workspace */
       }
     }
   }
}

