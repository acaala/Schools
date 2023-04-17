<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417083750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `member` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_school (member_id INT NOT NULL, school_id INT NOT NULL, INDEX IDX_DD4858887597D3FE (member_id), INDEX IDX_DD485888C32A47EE (school_id), PRIMARY KEY(member_id, school_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_school ADD CONSTRAINT FK_DD4858887597D3FE FOREIGN KEY (member_id) REFERENCES `member` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_school ADD CONSTRAINT FK_DD485888C32A47EE FOREIGN KEY (school_id) REFERENCES school (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member_school DROP FOREIGN KEY FK_DD4858887597D3FE');
        $this->addSql('ALTER TABLE member_school DROP FOREIGN KEY FK_DD485888C32A47EE');
        $this->addSql('DROP TABLE `member`');
        $this->addSql('DROP TABLE member_school');
        $this->addSql('DROP TABLE school');
    }
}
