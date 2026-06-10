#!/bin/bash
# === Script pour commit et push rapidement ===
# Si aucun message n'est donné en argument, on en demande un
if [ -z "$1" ]; then
  echo "Entrez un message de commit :"
  read message
else
  message="$1"
fi

# Étapes Git
git add .
git commit -m "$message"
git push

echo "✅ Commit et push terminés avec succès !"

# pour lancer 
# ./git-auto.sh "mon message" 
# ./git-auto.sh  et mettre le message apres