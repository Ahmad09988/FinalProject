pipeline {
    agent any
    stages {
        stage('Copy files to remote server') {
            steps {
                sshagent(['mywebapp.pem']) {
                    sh 'scp -r ${WORKSPACE}/* ec2-user@ec2-3-83-37-130.compute-1.amazonaws.com:/var/www/html/ahmadweb/'
                }
            }
        }
    }
}

