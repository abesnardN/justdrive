<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190516211632 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pays CHANGE idPays idPays CHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C8D68ADD3 FOREIGN KEY (fkUser) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CF9EA2394 FOREIGN KEY (adresseDepart) REFERENCES adresse (idadresse)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C3136779 FOREIGN KEY (addresseArrive) REFERENCES adresse (idadresse)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C543E411A FOREIGN KEY (fkVehicule) REFERENCES vehicule (idVehicule)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pays CHANGE idPays idPays CHAR(3) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C8D68ADD3');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CF9EA2394');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C3136779');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C543E411A');
    }
}
