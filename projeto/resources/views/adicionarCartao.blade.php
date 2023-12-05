@extends('layouts.app')

@section('titulo', 'adicionar Cartão')

@section('conteudo')

        @if(session('erroCartao'))
            <br>
            {{session('erroCartao.mensagem')}}
        @endif
<main class="container">
    <div style="padding-left: 200px;">Adicionar Cartão</div>
        <section class="ui" style="max-width: 2000px;">
            <div class="container-left">
                <form id="credit-card" action="/adicionarCartao/store" method="POST">
                    @csrf
                    <div class="number-container">
                        <label>Número</label>
                        <input type="text" name="numero" id="card-number" maxlength="19" placeholder="1234 5678 9101 1121"
                        required
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="name-container">
                        <label>Titular</label>
                        <input type="text" name="titular" id="name-text" maxlength="30" placeholder="NOAH JACOB"
                        required
                        onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.key == ' '">
                    </div>
                    <div class="infos-container">
                        <div class="expiration-container">
                            <label>Validade</label>
                            <input type="text" name="validade" id="valid-thru-text" maxlength="4" placeholder="02/40"
                            required
                            
                            onkeypress="return event.charCode >=48 && event.charCode <= 57">
                        </div>
                        <div class="cvv-container">
                            <label>CVV</label>
                            <input type="text" name="cvv" id="cvv-text" maxlength="4" placeholder="1234"
                            required
                            onkeypress="return event.charCode >=48 && event.charCode <= 57">
                        </div>
                    </div>
                    <input type="submit" value="Adicionar Cartão" id="add">
                </form>
            </div>
            <div class="container-right">
                <div class="cardz1">
                    <div class="intern">
                        <img class="approximation" src="../imagens/aprox.png" alt="aproximation">
                        <div class="card-number">
                            <div class="number-vl">1234 5678 9101 1121</div>
                        </div>
                        <div class="card-holder">
                            <label>Holder</label>
                            <div class="name-vl">NOAH JACOB</div>
                        </div>
                        <div class="card-infos">
                            <div class="exp">
                                <label>valid-thru</label>
                                <div class="expiration-vl">02/40</div>
                            </div>
                            <div class="cvv">
                                <label>CVV</label>
                                <div class="cvv-vl">123</div>
                            </div>
                        </div>
                        <img class="chip" src="../imagens/chip.png" alt="chip">
                    </div>
                </div>
            </div>
        </section>
    </main>


<script>
    const form = document.querySelector("#credit-card");
    const cardNumber = document.querySelector("#card-number");
    const cardHolder = document.querySelector("#name-text");
    const cardExpiration = document.querySelector("#valid-thru-text");
    const cardCVV = document.querySelector("#cvv-text");

    const cardNumberText = document.querySelector(".number-vl");
    const cardHolderText = document.querySelector(".name-vl");
    const cardExpirationText = document.querySelector(".expiration-vl");
    const cardCVVText = document.querySelector(".cvv-vl");

    cardNumber.addEventListener("keyup", (e) => {
        if (!e.target.value) {
            cardNumberText.innerText = "1234 5678 9101 1121";
        } else {
            const valuesOfInput = e.target.value.replaceAll(" ", "");

            if (e.target.value.length > 14) {
                e.target.value = valuesOfInput.replace(/(\d{4})(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3 $4");
                cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3 $4");
            } else if (e.target.value.length > 9) {
                e.target.value = valuesOfInput.replace(/(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3");
                cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{4})(\d{0,4})/, "$1 $2 $3");
            } else if (e.target.value.length > 4) {
                e.target.value = valuesOfInput.replace(/(\d{4})(\d{0,4})/, "$1 $2");
                cardNumberText.innerHTML = valuesOfInput.replace(/(\d{4})(\d{0,4})/, "$1 $2");
            } else {
                cardNumberText.innerHTML = valuesOfInput
            }
        }
    })

    cardHolder.addEventListener("keyup", (e) => {
        if (!e.target.value) {
            cardHolderText.innerHTML = "NOAH JACOB";
        } else {
            cardHolderText.innerHTML = e.target.value.toUpperCase();
        }
    })

    cardExpiration.addEventListener("keyup", (e) => {
        if (!e.target.value) {
            cardExpirationText.innerHTML = "02/40";
        } else {
            const valuesOfInput = e.target.value.replace("/", "");

            if (e.target.value.length > 2) {
                e.target.value = valuesOfInput.replace(/^(\d{2})(\d{0,2})/, "$1/$2");
                cardExpirationText.innerHTML = valuesOfInput.replace(/^(\d{2})(\d{0,2})/, "$1/$2");
            } else {
                cardExpirationText.innerHTML = valuesOfInput;
            }
        }
    })

    cardCVV.addEventListener("keyup", (e) => {
        if (!e.target.value) {
            cardCVVText.innerHTML = "123";
        } else {
            cardCVVText.innerHTML = e.target.value;
        }
    })
</script>

@endsection