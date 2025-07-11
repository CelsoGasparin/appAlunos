<?php



class Curso{
    private ?int $id;
    private ?string $nome;
    private ?string $turno;

    

    public function __construct($id,$nm,$trn){
        $this->id = $id;
        $this->nome = $nm;
        $this->turno = $trn;
    }


    public function getNomeTurno(){
        switch($this->getTurno()){
            case'V':
                return $this->getNome().' - Vespertino';
            break;
            case'M':
                return $this->getNome().' - Matutino';
            break;
            case'N':
                return $this->getNome().' - Noturno';
            break;
            
            default:
                return 'Valor de Turno Errado';
            break;
        }
        
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of turno
     */
    public function getTurno(): ?string
    {
        return $this->turno;
    }
    public function getTurnoTexto(){
        switch($this->getTurno()){
            case'V':
                return 'Vespertino';
            break;
            case'M':
                return 'Matutino';
            break;
            case'N':
                return 'Noturno';
            break;
            
            default:
                return 'Valor de Turno Errado';
            break;
        }
        
    }

    /**
     * Set the value of turno
     */
    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}