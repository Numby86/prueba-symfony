<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411160755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente_usuario (cliente_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_C3D42BA9DE734E51 (cliente_id), INDEX IDX_C3D42BA9DB38439E (usuario_id), PRIMARY KEY(cliente_id, usuario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cliente_usuario ADD CONSTRAINT FK_C3D42BA9DE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cliente_usuario ADD CONSTRAINT FK_C3D42BA9DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente_usuario DROP FOREIGN KEY FK_C3D42BA9DE734E51');
        $this->addSql('ALTER TABLE cliente_usuario DROP FOREIGN KEY FK_C3D42BA9DB38439E');
        $this->addSql('DROP TABLE cliente_usuario');
    }
}
