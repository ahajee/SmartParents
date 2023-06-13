
const questions = [
    {
         question: "How to limit gaming time of 1-7 years old?",
         answers: [
            {  text: "30 minutes a day" , correct: true},
            {  text: "3 hours a day" , correct: false },
            
         ]
     },
     
 
     {
         question: "What are the guidelines that parents can follow to limit the time of playing games for their children?",
         answers: [
             {  text: "Outline specific rules, follow through with consequences, and reduce the time for video games slowly by slowly.", correct: true },
             {  text: "Be with (monitor) them playing games, enable YoutTube Kids, give them ample time to play games.", correct: false },
 
         ]
     },

     {
        question: "What are the possible threats for children when they play online games?",
        answers: [
            {  text: "Health issues, cyberbully, exposure on cyber-pedophiles.", correct: true },
            {  text: "Fake news, good online friends.", correct: false },
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