const questions = [
    {
         question: "Do you aware that a lot of things can happen on social media?",
         answers: [
            {  text: "Yes" , correct: true},
            {  text: "No" , correct: false },
 
         ]
     },
     
 
     {
         question: "Fake news is everywhere on social media. How to stop those news from spreading among parents?",
         answers: [
             {  text: "Identify the resources if it is truested or a scam.", correct: true },
             {  text: "Believing others that you can share whatever content to get viral.", correct: false },
 
         ]
     },
 
     {
         question: "What is the way to protect your family?",
         answers: [
             {  text: " Stop oversharing any content related to your family or surrounding most of the time.", correct: true },
             {  text: "I love to share my happiness with everyone. Therefore, i feel it is okay to share about my family to others.", correct: false },
         ]
     },

     {
        question: "How do you think social media is good for you?",
        answers: [
            {  text: "Social media is good in many ways but I need to always be careful to not overshare my updates.", correct: true },
            {  text: "I can post, update and share with people my daily routines of who I am with, or sharing where I have been.", correct: false },
        ]
    }
 ];
 
 const questionElement = document.getElementById("question");
 const answerButtons = document.getElementById("answer-buttons");
 const nextButton = document.getElementById("next-btn");
 
 let currentQuestionIndex = 0;
 let score = 0;
 
 
 function startQuiz(){
     currentQuestionIndex = 0;
     score = 0;
     nextButton.innerHTML = "Next";
     showQuestion();
 }
 
 function showQuestion(){
     resetState();
     let currentQuestion = questions[currentQuestionIndex];
     let questionNo = currentQuestionIndex + 1;
     questionElement.innerHTML = questionNo + ". " + currentQuestion.question;
 
     currentQuestion.answers.forEach(answer => {
         const button = document.createElement("button");
         button.innerHTML = answer.text;
         button.classList.add("btn");
         answerButtons.appendChild(button);
         if(answer.correct){
             button.dataset.correct = answer.correct;
         }
         button.addEventListener("click", selectAnswer);
     });
 }
 
 function  resetState(){
     nextButton.style.display = "none";
     while (answerButtons.firstChild){
         answerButtons.removeChild(answerButtons.firstChild);
     }
 }
 
 function selectAnswer(e){
     const selectedBtn = e.target;
     const isCorrect = selectedBtn.dataset.correct === "true";
     if(isCorrect){
         selectedBtn.classList.add("correct");
         score++;
     }else{
         selectedBtn.classList.add("incorrect");
     }
     Array.from(answerButtons.children).forEach(button => {
         if(button.dataset.correct === "true"){
             button.classList.add("correct");
         }
         button.disabled = true;
     });
     nextButton.style.display = "block";
 }
 
 function showScore(){
     resetState();
     questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
     nextButton.innerHTML = "Play Again";
     nextButton.style.display = "block";
 }
 
 function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
     showQuestion();
    }else{
         showScore();
    }
 }
 
 
 nextButton.addEventListener("click", ()=>{
     if(currentQuestionIndex < questions.length){
         handleNextButton();
     }else{
         startQuiz();
     }
 });
 
 startQuiz();