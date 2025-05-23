<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $roles = ['ROLE_ADMIN'];

        yield TextField::new('email', 'Adresse e-mail');

        // Affiche le champ mot de passe uniquement sur la page de création
        if ($pageName === Crud::PAGE_NEW) {
            yield Field::new('password', 'Mot de passe')
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'invalid_message' => 'Les mots de passe ne correspondent pas.',
                    'required' => true,
                    'first_options' => ['label' => 'Mot de passe'],
                    'second_options' => ['label' => 'Confirmer le mot de passe'],
                ]);
        }

        // Affiche les rôles dans toutes les pages (create, edit, detail)
        yield ChoiceField::new('roles', 'Rôles')
            ->setChoices(array_combine($roles, $roles))
            ->allowMultipleChoices()
            ->renderExpanded()
            ->renderAsBadges();
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof User) {
            return;
        }

        $this->handlePasswordHashing($entityInstance);
        $this->addFlash('success', '✅ Utilisateur créé avec succès.');
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof User) {
            return;
        }

        $this->handlePasswordHashing($entityInstance);
        $this->addFlash('success', '✅ Utilisateur mis à jour avec succès.');
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function handlePasswordHashing(User $user): void
    {
        $plainPassword = $user->getPassword();

        // Évite de re-hasher un mot de passe vide ou déjà encodé
        if (!empty($plainPassword) && strlen($plainPassword) < 60) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
        }
    }
}
