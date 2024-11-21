<?php

require_once("models/Arqueiro.php");
require_once("models/Dragao.php");
require_once("models/Goblin.php");
require_once("models/Mago.php");
require_once("models/MainCharacter.php");
require_once("models/Monstro.php");

function batalhar($personagem, $monstro){
    while ($personagem->getVida() > 0 && $monstro->getVida() > 0) {
        $personagem->mostrarDados();
        echo "=== " . $monstro->getNome() . " ===\nVida: " . $monstro->getVida() . "\n";
        
        echo "\nEscolha uma ação:\n";
        echo "1 - Atacar\n";
        echo "2 - Desviar\n";
        echo "3 - Comprar Poção (5 moedas)\n";
        echo "4- Abrir Glossário\n\n";
        $acao = readline("Digite sua escolha: ");
        switch($acao) {
            case 1:
                $personagem->setDanoAtaque(rand(15, 60));
                $personagem->atacar($monstro);

                if ($monstro->getVida() <= 0) {
                    echo $monstro->getNome() . " foi derrotado!\n";
                    echo "Você coletou 5 moedas de ouro de " . $monstro->getNome() . "\n";
                    $personagem->setMoedasDeOuro($personagem->getMoedasDeOuro() + 5);
                break;
            }

                break;

            case 2:
                if (rand(1, 100) <= 20) {
                    echo $personagem->getNome() . " falhou ao desviar!\n";
                    $personagem->receberDano($monstro->getDanoAtaque());
                } else {
                    echo $personagem->getNome() . " desviou do ataque!\n";
                    $cura = $personagem->getVida() * 0.10; 
                    $personagem->setVida($personagem->getVida() + $cura);
                    echo $personagem->getNome() . " se curou em $cura pontos de vida!\n";
                }
                break;

            case 3:
                $curaPocao = 45;
                if ($personagem->getMoedasDeOuro() >= 5){
                    if($personagem->getVida() > 55) {
                        echo "Você bebeu uma poção e se sentiu restaurado!\nIsso te curou em " . 100 - $personagem->getVida() . " pontos de vida!!\n";
                        $personagem->setVida(100);
                    } else {
                        $personagem->setVida($personagem->getVida() + 45);
                        echo "Você bebeu uma poção e se sentiu restaurado!\nIsso te curou em $curaPocao pontos de vida!!\n";
                    }
                    $personagem->setMoedasDeOuro($personagem->getMoedasDeOuro() - 5);
                } else {
                    echo "Vocẽ não tem moedas de ouro o suficiente! Elimine mais monstros!\n";
                }
                break;

            case 4:
                echo "Bem-Vindo ao glossário, aqui você aprende sobre os monstros que você enfrenta!\n\n";
                echo "=== Goblins ===\nVida: 80\nDano de ataque: 15 a 30\nPossuem a habilidade de roubar suas moedas.\n\n";
                echo "=== Dragões ===\nVida: 150\nDano de ataque: 5 a 25\nPodem voar, ao voar causam entre 15 e 30 de dano.\n\n";
                echo "Fechando Glossário...\n\n";
                break;

            default:
                echo "Essa ação não existe, seu personagem não soube o que fazer e foi atacado!\n";

        }

        if ($monstro->getVida() > 0) {
            if($monstro->getVida() < 100 and $acao != 4){
                if($monstro->getNome() == "Goblin") {
                    $monstro->roubar();
                    if($personagem->getMoedasDeOuro() > 0){
                        $personagem->setMoedasDeOuro($personagem->getMoedasDeOuro() - 5);
                    }
                } else if ($monstro->getNome() == "Dragão") {
                    $monstro->voar();
                }
                $monstro->setDanoAtaque(rand(15, 30));
            } else {
                $monstro->setDanoAtaque(rand(5, 25));
            }

            if ($acao != 2 and $acao != 4) { 
                $personagem->receberDano($monstro->getDanoAtaque());
                echo $monstro->getNome() . " atacou causando " . $monstro->getDanoAtaque() . " de dano!\n";
            }
        }
        
        if ($personagem->getVida() <= 0) {
            echo $personagem->getNome() . " foi derrotado!\n";
            echo "Você perdeu! Treine mais antes de tentar novamente!\n";
            break;
        }
    }
}

$opcao = readline("Escolha o tipo de Personagem: 1 - Arqueiro || 2 - Mago: ");
$personagem = null;
$dragao = new Dragao;
$goblin = new Goblin;

switch ($opcao) {
    case 1:
        $personagem = new Arqueiro("Arco", rand(15, 50));
        $classe = "arqueiro";
        break;
    case 2:
        $personagem = new Mago("Cajado", rand(10, 60));
        $classe = "mago";
        break;
    default:
        echo "Você saiu da seleção de personagens! Até breve!\n";
        exit;
}

echo "\nBatalha iniciada!\n";
batalhar($personagem, $goblin);
batalhar($personagem, $dragao);

if($personagem->getVida() > 0){
    echo "Parabéns, " . $personagem->getNome() . ".\nVocê venceu o treinamento de nível 1!\n";
    echo "Agora vocẽ pode ser considerado um verdadeiro $classe \n";
}