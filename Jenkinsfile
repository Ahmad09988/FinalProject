pipeline{
    agent any
    environment{
        staging_server="3.83.37.130"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -r -i -i "mywebapp.pem" -o StrictHostKeyChecking=no ${WORKSPACE}/* ec2-user@ec2-3-83-37-130.compute-1.amazonaws.com:/var/www/html/ahmadweb$/'
            }
        }
    }
}
