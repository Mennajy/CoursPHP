<?php

/**
 * Class MammifereClass
 *
 * Représente un mammifère
 */
class AnimalClass
{
    protected $type='Mammifère';
    protected $nom = 'Un animal indéfini';
    /**
     * @var int Nombre de pattes du mammifère
     */
    protected $nbPattes = 0;
    /**
     * @var int Nombre de nageoires
     */
    protected $nbNageoires = 0;
    /**
     * @var null Couleur de l'animal
     */
    protected $couleur = null;
    /**
     * @var bool Définit si l'animal a de la fourrure
     */
    protected $fourrure = false;

    /**
     * @var int Points de vie de l'animal
     */
    protected $vie = 100;
      /**
     * MammifereClass constructor.
     *
     * @param int $nbPattes Nombre de pattes
     * @param int $nbNageoires Nombre de nageoires
     * @param string $couleur Couleur de l'animal
     * @param boolean $fourrure Animal à fourrure ?
     */
    public function __construct($nom, $nbPattes, $nbNageoires, $couleur, $fourrure, $vie = 100)
    {
        $this->nom = $nom;
        $this->nbPattes = $nbPattes;
        $this->nbNageoires = $nbNageoires;
        $this->couleur = $couleur;
        $this->fourrure = $fourrure;
        $this->vie = 100;
    }

    /**
     * @return int
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getNbPattes()
    {
        return $this->nbPattes;
    }

    /**
     * @return int
     */
    public function getNbNageoires()
    {
        return $this->nbNageoires;
    }

    /**
     * @return null
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @return bool
     */
    public function hasFourrure()
    {
        return $this->fourrure;
    }

    /**
     * @return bool
     */
    public function isVivant()
    {
        return $this->vie > 0;
    }

    /**
     * Permet de blesser le mammifère
     */
    public function blesser($nbPoints)
    {
        if ($this->vie - $nbPoints <= 0) {
            $this->vie = 0;
            echo '<p><em>' . $this->nom . ' est mort...</em></p>';
        } else {
            $this->vie -= $nbPoints;
            echo '<p><em>' . $this->nom . ' perd ' . $nbPoints . ' points...</em></p>';
        }
    }

    /**
     * Permet de guérir le mammifère
     */
    public function guerir($nbPoints)
    {
        if ($this->isVivant()) {
            $this->vie += $nbPoints;
            echo '<p><em>' . $this->nom . ' a gagné ' . $nbPoints . ' points...</em></p>';
        } else {
            echo '<p><em>' . $this->nom . ' est mort, il ne peut être soigné.</em></p>';
        }
    }

    public function description()
    {
        echo '<ul>'
            . '<li>Je m\'appelle ' . $this->nom . '</li>'
            . '<li>Je suis de race ' . $this->type . '</li>'
            . '<li>J\'ai ' . $this->nbPattes . ' pattes et ' . $this->nbNageoires . ' nageoires</li>'
            . '<li>Je suis tout ' . $this->couleur . '</li>'
            . '<li>J\'ai actuellement ' . $this->vie . ' points de vie</li>'
            . '</ul>';
    }

    public function dire($phrase)
    {
        echo '<p><strong>' . $this->nom . ' &gt; </strong>' . $phrase . '</p>';
    }
}

class FelinClass extends AnimalClass{
  protected $type ='Félin';
  public function dire($phrase)
  {
      echo '<p><strong>' . $this->nom . ' &gt; </strong> miaou : ' . $phrase . '</p>';
  }
  public function __construct($nom,$couleur, $vie = 100)
  {
    parent::__construct($nom,4,0,$couleur,true,$vie);
  }
}

class CoincoinClass extends AnimalClass{
    protected $type ='Canard';
    public function dire($phrase)
    {
      echo '<p><strong>' . $this->nom . ' &gt; </strong> Coin : ' . $phrase . '</p>';
    }
    public function __construct($nom,$couleur, $vie = 100)
    {
      parent::__construct($nom,4,0,$couleur,true,$vie);
    }
  }


// Création des mammifères
$robert = new FelinClass('Robert le chat','gris', 100);
$john = new CoincoinClass('John le canard','bleu', 100);
// Laissons les se présenter...
echo 'Voici Robert: ';
$robert->description();

echo 'Robert glisse d\'un toit et se fait mal:';
$robert->dire('Oups...');
$robert->blesser(10);
echo 'Il essaie de traverser la route mais boîte. Il n\'a pas le temps de se sauver devant la voiture qui arrive';
$robert->dire('aaaaaHhahahAHhAhHHAHAHA !!!!');
$robert->blesser(80);
echo 'John le voit et dit';
$john->dire('Aïe, ça n\'a pas l\'air d\'aller... comment t\'appelles tu ?');
$robert->description();

$john->dire('Mon pauvre Robert, laisse moi t\'aider !');
echo 'Il veut soigner Robert...';
$robert->guerir(10);
echo 'Mais John n\'est pas très bon';
$robert->blesser(50);
echo 'Il persiste...';
$robert->guerir(10);
