pipeline {
    agent any

    // Docker credentails
    environment {
		DOCKERHUB_CREDENTIALS=credentials('segisto-dockerhub')
	}

    stages {
        stage("Build de l'image de l'application") {
             steps {
		//Lister tous les images     
		sh 'docker images -a'
                sh 'docker build -t app_pharmacies ./app/'
                echo "Building application image"
             }
        }
	    
        // Build de l’image de la base de données
        stage("Build de l'image de la base de données") {
             steps {
                sh 'docker build -t db_pharmacies .'
                echo "Building database image"
             }
        }
	    
        stage('Prepare Environement') {
            steps
            {
                script {
                    containerName = sh(returnStdout: true, script: "docker ps  -f 'name=adminbd' --format '{{.Names}}'").trim()
                    containerNames = sh(returnStdout: true, script: "docker ps  -f 'name=php8' --format '{{.Names}}'").trim()
                    containerNamess = sh(returnStdout: true, script: "docker ps  -f 'name=bd' --format '{{.Names}}'").trim()
                    if(containerName == "adminbd" || containerNames == "php8" || containerNamess == "bd")
                    {
                        sh 'docker rm bd --force'
                        sh "echo 'Nettoyage environnement OK'"
                        sh 'docker rm phpmyadmin --force'
                        sh "echo 'Nettoyage environnement OK'"
                        sh 'docker rm php_app --force'
                        sh "echo 'Nettoyage environnement OK'"
                    }
                    else
                    {
                        sh "echo 'Ennvironnement OK'"
                    }
                }
            }
         }
        // Déploiement des services via Docker Compose
        stage('Déploiement des services via docker-compose') {
             steps {
                sh 'docker-compose up -d'
             }
            post{
                success{
                    echo "Build image de l'application réussie."
                    echo "Build image de la base de données réussie."
                }
        }
        }
	    
        // Test de l’application avec curl et navigateur web
        stage('Test application') {
            steps {
               sh 'curl http://localhost:9000'
            }
        }
	    
        //Connexion à Github
        stage('Connexion à Docker Hub') {

			steps {
				sh 'echo $DOCKERHUB_CREDENTIALS_PSW | docker login -u $DOCKERHUB_CREDENTIALS_USR --password-stdin'
			}
		}
	//Tag des images
        stage('Tag des images') {

			steps {
				sh 'docker ps'
				sh 'docker tag mysql:8.0  segisto/mysql_images:1.0'
                		sh 'docker tag continuous-delivery-pharmacie_web:latest segisto/http_images:1.0'
				sh 'docker tag phpmyadmin:5.2.0-apache  segisto/phpmyadmin_images:1.0'
          
			}
		}

        // Push des images Docker sur Docker Hub
		stage('Push des images docker sur Docker Hub') {

			steps {
				sh 'docker images -a'
				sh 'docker push segisto/mysql_images:1.0'
				sh 'docker push segisto/http_images:1.0'
				sh 'docker push segisto/phpmyadmin_images:1.0'
				echo "Push reussi."
          
			}
            
		}
        
    }
    post {
        success {
            slackSend message:"A new version of pharmacie_app is succesful build - ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"
                }
        }
}
