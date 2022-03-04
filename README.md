# SISR-Projet
Projet site web pdo BTS SISR SIO 1ére année by Rutella Lucas, Diaz Lucas, Bagana Wassim, GraF Julien

    ✅ Développement user
    ❌ Développement admin
        ➖ Update user by admin
        ➖ Recherche pays
        
        
        
        
        
📝 Table sql (au cas ou)       
        DROP TABLE IF EXISTS `users`;
        CREATE TABLE IF NOT EXISTS `users` (
          `id` int NOT NULL AUTO_INCREMENT,
          `nom` varchar(255) NOT NULL,
          `prenom` varchar(255) NOT NULL,
          `age` int NOT NULL,
          `metier` varchar(255) NOT NULL,
          `pays` varchar(255) NOT NULL,
          `role` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user' COMMENT 'user | admin',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
