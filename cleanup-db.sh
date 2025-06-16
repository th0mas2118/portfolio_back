#!/bin/bash

echo "🧹 Nettoyage de Laravel pour API sans DB..."

# Supprimer les migrations
echo "🗑️ Suppression des migrations..."
rm -rf database/migrations/*

# Supprimer les factories
echo "🗑️ Suppression des factories..."
rm -rf database/factories/*

# Supprimer les seeders (garder DatabaseSeeder.php vide)
echo "🗑️ Nettoyage des seeders..."
find database/seeders -name "*.php" -not -name "DatabaseSeeder.php" -delete

# Supprimer le fichier SQLite
echo "🗑️ Suppression du fichier SQLite..."
rm -f database/database.sqlite

echo "✅ Nettoyage terminé !"
echo ""
echo "📝 Prochaines étapes manuelles :"
echo "  • Modifier le .env pour supprimer les références DB"
echo "  • Modifier config/app.php pour supprimer les providers DB"
echo "  • Nettoyer composer.json si nécessaire"
