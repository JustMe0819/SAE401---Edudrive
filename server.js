const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const bcrypt = require('bcryptjs'); // Importer bcrypt pour le hachage des mots de passe
const app = express();

// Middleware pour gérer les CORS (Cross-Origin Resource Sharing)
app.use(cors());

// Middleware pour parser le corps des requêtes
app.use(bodyParser.json());

// Simulation de base de données d'élèves
const eleves = [
  { neph: '123456', password: bcrypt.hashSync('123456', 10) }, 
  { neph: '789012', password: bcrypt.hashSync('123456', 10) }, 
  { neph: '345678', password: bcrypt.hashSync('123456', 10) }, 
  { neph: '901234', password: bcrypt.hashSync('123456', 10) }, 
  { neph: '567890', password: bcrypt.hashSync('123456', 10) }, 
];

// Route de connexion
app.post('/login', (req, res) => {
  const { neph, password } = req.body;
  
  // Chercher l'élève dans la base de données
  const eleve = eleves.find((e) => e.neph === neph);

  // Vérifier si l'élève existe et comparer les mots de passe
  if (eleve && bcrypt.compareSync(password, eleve.password)) {
    res.status(200).json({ message: 'Connexion réussie' });
  } else {
    res.status(401).json({ message: 'Numéro NEPH ou mot de passe incorrect' });
  }
});

// Démarrer le serveur
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Serveur en cours d'exécution sur http://localhost:${PORT}`);
});
