<?php
	/**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

	namespace Ekolo\Component\Console\Commands;
	
	use Ekolo\Component\EkoMagic\ParameterBag;
	use Ekolo\Component\Console\ExecuteCommands;

	/**
	 * Permet de gérer les commandes
	 */
	class NewProject extends ExecuteCommands
	{
		public function __construct(array $command, array $argv)
		{
			parent::__construct($command, $argv);
		}

		public function newProject($vars)
		{
			if (empty($vars)) {
				\console_log("Veuillez ajouter le nom du projet après 'new' (ex: php ekolo new blog)", true);
			}

			$currentDir = $this->currentDir();
			$project = $vars[0];
			$currentDir = \preg_replace('#\n#', '', $currentDir);
			$currentDir .= DIRECTORY_SEPARATOR.$project;

			// \console_log((string) $currentDir);

			$this->createProject($currentDir, $project);
		}

		public function init()
		{
			\console_log($this->argv);
			// echo shell_exec('composer');
		}

		/**
		 * Permet de lancer la création du nouveau projet
		 * @param string $dir Le dossier du projet
		 * @param string $project Le nom du projet
		 * @return void
		 */
		public function createProject(string $dir, string $project)
		{	
			if (file_exists($dir)) {
				\console_log("Un projet existe déjà dans ce répertoire", true);
			}else {
				$creating = \mkdir($dir);

				if ($creating) {
					$zip = new \ZipArchive;
					$default_project = __DIR__.'/../../Prototypes/default.zip';

					if ($zip->open($default_project) === TRUE) {
						$zip->extractTo($dir);
						$zip->close();

						\console_log("\n\n   crée : $project".D_S);
						\console_log("\n   crée : $project".D_S.'app'.D_S);
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Controllers'.D_S);
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Controllers'.D_S.'PagesController.php');
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Middleware'.D_S);
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Middleware'.D_S.'ErrorsMiddleware.php');
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Models'.D_S);
						\console_log("\n   crée : $project".D_S.'app'.D_S.'Models'.D_S.'PagesModel.php');
						\console_log("\n   crée : $project".D_S.'bootstrap'.D_S.'app.php');
						\console_log("\n   crée : $project".D_S.'bootstrap'.D_S.'constantes.php');
						\console_log("\n   crée : $project".D_S.'bootstrap'.D_S.'helpers.php');
						\console_log("\n   crée : $project".D_S.'config'.D_S.'app.php');
						\console_log("\n   crée : $project".D_S.'config'.D_S.'database.php');
						\console_log("\n   crée : $project".D_S.'config'.D_S.'namespace.php');
						\console_log("\n   crée : $project".D_S.'config'.D_S.'path.php');
						\console_log("\n   crée : $project".D_S.'public'.D_S.'css'.D_S.'style.css');
						\console_log("\n   crée : $project".D_S.'public'.D_S.'img'.D_S.'ekolo-logo.png');
						\console_log("\n   crée : $project".D_S.'public'.D_S.'js'.D_S);
						\console_log("\n   crée : $project".D_S.'routes'.D_S.'pages.php');
						\console_log("\n   crée : $project".D_S.'views'.D_S.'errors'.D_S);
						\console_log("\n   crée : $project".D_S.'views'.D_S.'errors'.D_S.'404.php');
						\console_log("\n   crée : $project".D_S.'views'.D_S.'errors'.D_S.'error.php');
						\console_log("\n   crée : $project".D_S.'views'.D_S.'pages'.D_S.'index.php');
						\console_log("\n   crée : $project".D_S.'views'.D_S.'layout.php');
						\console_log("\n   crée : $project".D_S.'.env');
						\console_log("\n   crée : $project".D_S.'.gitignore');
						\console_log("\n   crée : $project".D_S.'.htaccess');
						\console_log("\n   crée : $project".D_S.'composer.json');
						\console_log("\n   crée : $project".D_S.'ekolo');
						\console_log("\n   crée : $project".D_S.'index.php');
						\console_log("\n\n   Accéder au dossier du projet:");
						\console_log("\n    > cd $project");
						\console_log("\n\n   Installez les dépendances:");
						\console_log("\n    > composer install");
						\console_log("\n\n   Générer l'autoloader de class:");
						\console_log("\n    > composer dumpautoload -o");
						\console_log("\n\n   Lancer le projet:");
						\console_log("\n    > php ekolo serve");
						\console_log("\n", true);
					}
				}
			}

			\console_log("Erreur de la création du peojet. Veuillez réssayer.");
		}
	}
