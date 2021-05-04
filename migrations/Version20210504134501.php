<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504134501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluateurs ADD dmm_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evaluateurs ADD CONSTRAINT FK_8662AD5E13496CEF FOREIGN KEY (dmm_id) REFERENCES intervenant_ansmdmm (id)');
        $this->addSql('CREATE INDEX IDX_8662AD5E13496CEF ON evaluateurs (dmm_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluateurs DROP FOREIGN KEY FK_8662AD5E13496CEF');
        $this->addSql('DROP INDEX IDX_8662AD5E13496CEF ON evaluateurs');
        $this->addSql('ALTER TABLE evaluateurs DROP dmm_id');
    }
}
