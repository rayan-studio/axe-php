# Politique de sécurité

## Versions supportées

Axe est encore en développement actif. Les correctifs de sécurité sont appliqués en priorité sur la branche principale (`main`).

## Signaler une vulnérabilité

Si vous découvrez une faille de sécurité dans Axe (backend, frontend, ou infrastructure), merci de **ne pas** ouvrir d'issue publique sur GitHub. Une divulgation publique prématurée expose les utilisateurs avant qu'un correctif ne soit disponible.

À la place, merci de nous contacter directement :

- **Email** : security@axe.chat 
- **Objet** : `[SECURITY] Résumé court de la faille`

Merci d'inclure autant d'informations que possible :

- Description de la vulnérabilité et de son impact potentiel
- Étapes de reproduction (PoC si possible)
- Version / commit concerné
- Toute suggestion de correctif, si vous en avez une

## Délais de traitement

- **Accusé de réception** : sous 48h
- **Premier retour sur la gravité et le plan d'action** : sous 7 jours
- **Correctif** : selon la criticité, généralement sous 30 jours

## Divulgation responsable

Nous demandons un délai raisonnable avant toute divulgation publique, le temps qu'un correctif soit déployé. Une fois le correctif publié, nous sommes heureux de créditer les personnes ayant signalé la faille (sauf si vous préférez rester anonyme).

## Périmètre

Sont notamment concernés :

- Le backend (API FastAPI, base de données, authentification)
- Le frontend (XSS, injection, fuite de données côté client)
- L'infrastructure (configuration serveur, secrets exposés, dépendances vulnérables)

Ne sont **pas** dans le périmètre :

- Les attaques par déni de service (DoS/DDoS) volumétriques
- Le social engineering visant les mainteneurs
- Les vulnérabilités dans des dépendances tierces déjà connues et documentées publiquement (merci toutefois de nous les signaler si elles ne sont pas encore corrigées côté Axe)

## Bonnes pratiques du projet

- Les secrets (clés API, tokens) ne doivent jamais être commit dans le dépôt
- Les dépendances sont mises à jour régulièrement
- Toute contribution touchant à l'authentification ou à la gestion des permissions fait l'objet d'une revue attentive

Merci de contribuer à garder Axe sûr pour tout le monde.