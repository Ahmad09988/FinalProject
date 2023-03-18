pipeline{
    agent any
    environment{
        staging_server="3.83.37.130"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                
                sh 'scp -i /home/ec2-user/mywebapp.pem -r /var/lib/jenkins/workspace/mywebapp/* root@3.83.37.130:/var/www/html/ahmadweb/' 
                
            }
        }
    }
}
