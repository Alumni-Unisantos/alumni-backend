<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240519034502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE email_user email_user VARCHAR(255) NOT NULL, CHANGE vl_document vl_document VARCHAR(255) NOT NULL, CHANGE rm_user rm_user VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE email_user email_user VARCHAR(255) DEFAULT \'NULL\', CHANGE vl_document vl_document VARCHAR(255) DEFAULT \'NULL\', CHANGE rm_user rm_user INT NOT NULL');
    }
}
