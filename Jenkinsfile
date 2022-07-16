pipeline {
    agent any

    stages {

        stage('Prepare Environement') {
            steps
            {
                script {
                    containerName = sh(returnStdout: true, script: "docker ps -a -f 'name=training-phpmyadmin-1' --format '{{.Names}}'").trim()
                    containerNames = sh(returnStdout: true, script: "docker ps -a -f 'name=mysql8' --format '{{.Names}}'").trim()
                    containerNamess = sh(returnStdout: true, script: "docker ps -a -f 'name=php8' --format '{{.Names}}'").trim()
                    if(containerName == "training-phpmyadmin-1" || containerNames == mysql8 || containerNamess == php8)
                    {
                        sh 'docker rm training-phpmyadmin-1 --force'
                        sh 'docker rm mysql8 --force'
                        sh 'docker rm php8 --force'
                        sh "echo 'Nettoyage environnement OK'"
                    }
                    else
                    {
                        sh "echo 'Ennvironnement OK'"
                    }
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                sh 'docker-compose up '
                sh 'sleep 15s'
            }
        }
        stage('Test Docker Container') {
            steps {
               sh 'curl http://localhost:9000'
            }
        }

    }
}