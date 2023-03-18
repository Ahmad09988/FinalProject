pipeline{
    agent any
    environment{
        staging_server="3.83.37.130"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -i /home/ec2-user/mywebapp.pem -r /var/lib/jenkins/workspace/mywebapp/* ec2-user@3.83.37.130:/tmp/ && ssh -i /home/ec2-user/mywebapp.pem ec2-user@3.83.37.130 \'sudo cp -r /tmp/* /var/www/html/ahmadweb/\''
            }
        }
    }
}
