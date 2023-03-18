pipeline{
    agent any
    environment{
        staging_server="3.83.37.130"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                sh 'scp -r ${WORKSPACE}/* ec2-user@${staging_server}:/var/www/html/ahmadweb/'
            }
        }
    }
}
