<?php
namespace App\Controller;
use App\Model\MembersManager;

class MembersController extends Controller
{
    public function register()
    {
        if(isset($_POST['memberName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
            $errors = array();
            $membersManager = new MembersManager();
            $memberName = $this->cleanVar($_POST['memberName']);
            $email = $this->cleanVar($_POST['email']);
            $password = $this->cleanVar($_POST['password']);
            $passwordConfirm = $this->cleanVar($_POST['passwordConfirm']);
            //Traitement du pseudonyme
            if(empty($memberName) || !preg_match('/^[a-zA-Z0-9_]+$/', $memberName)) {
                $errors['memberName'] = "Ce pseudonyme n'est pas valide (alphanumérique)";
            }
            //le pseudo est-il dejà pris? Vérifions dans la base de données.
            $memberExists = $membersManager->getMemberByName($memberName);
            if ($memberExists) {
                $errors['memberName'] = 'Ce pseudonyme est dejà pris';
            }
            if (empty($email) || !filter_var(($email),FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Cet e-mail n'est pas valide";
            }
            $emailExists = $membersManager->getMemberByEmail($email);
            if ($emailExists) {
                $errors['email'] = "Cette adresse email est dejà utilisée";
            }
            if (empty($password) || empty($passwordConfirm)) {
                $errors['password'] = "Un mot de passe est manquant";
            }
            if ($password != $passwordConfirm) {
                $errors['passwordMatch'] = "Les mots de passe ne sont pas identiques";
            }
            if (empty($errors)) {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                //On insère dans la base (avec une méthode euh...AddMember)
                $membersManager->addMember($memberName, $passwordHashed, $email);
                //session_start();
                $_SESSION['memberName'] = $memberName;
                $_SESSION['member_id'] = $memberExists['member_id'];
                $_SESSION['isAdmin'] = $memberExists['isAdmin'];
                //session flash avec un message du genre: Bravo! Vous êtes désormais connecté. Enjoy!?
                header('location: index.php');
            }
        }
        require('View/frontend/registerView.php');
    }
    public function login()
    {
        if (isset($_POST['memberName']) && isset($_POST['password'])) {
            //récupération et nettoyage des éléments
            $membersManager = new MembersManager();
            $memberName = $this->cleanVar($_POST['memberName']);//
            $password = $this->cleanVar($_POST['password']);//
            //recherche du pseudo dans la base de données
            $memberExists = $membersManager->getMemberByName($memberName);
            //Si pseudo pas trouvé, on renvoie une erreur (pseudo inconnu, tout ça)
            if (!$memberExists) {
                $errors['memberName'] = "Ce pseudonyme n'existe pas.";
                //sinon -> pseudo trouvé dans la base, on continue
            } elseif (!password_verify($password, $memberExists['password'])) {
                $errors['password'] = "Mot de passe incorrect!";
            }
            //si aucune erreur, connexion :)
            if (empty($errors)) {
                //on pourrait factoriser le code, c'est le même que celui du dessus. Genre... une méthode LoginSuccess()
                //session_start();
                $_SESSION['memberName'] = $memberName;
                $_SESSION['member_id'] = $memberExists['member_id'];
                $_SESSION['isAdmin'] = $memberExists['is_admin'];
                if ($_SESSION['isAdmin'] == 1) {
                    $this->admin();
                    die();
                } else {
                    header('location: index.php');
                }
            }
        }
        require('View/frontend/loginView.php');
    }
    public function logout()
    {
        session_destroy();
        unset($_SESSION['memberName']);
        header('location: index.php');
    }
}