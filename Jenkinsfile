pipeline {
    agent any
    stages {
        stage('Copy files to remote server') {
            steps {
                sshagent(['mywebapp.pem']) {
                    sh 'scp -r /var/lib/jenkins/workspace/mywebapp/* ec2-user@3.83.37.130:/tmp/'
                }
                sshagent(['mywebapp.pem']) {
                    sh 'ssh ec2-user@3.83.37.130 sudo cp -r /tmp/* /var/www/html/ahmadweb/'
                }
            }
        }
    }
}

