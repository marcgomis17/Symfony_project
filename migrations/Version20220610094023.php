<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610094023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE professeur_module (professeur_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_BB082478BAB22EE9 (professeur_id), INDEX IDX_BB082478AFC2B591 (module_id), PRIMARY KEY(professeur_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE professeur_module ADD CONSTRAINT FK_BB082478BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professeur_module ADD CONSTRAINT FK_BB082478AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE module_professeur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE module_professeur (module_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_82407904AFC2B591 (module_id), INDEX IDX_82407904BAB22EE9 (professeur_id), PRIMARY KEY(module_id, professeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE module_professeur ADD CONSTRAINT FK_82407904AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_professeur ADD CONSTRAINT FK_82407904BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE professeur_module');
    }
}
