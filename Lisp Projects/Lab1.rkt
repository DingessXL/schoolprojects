#lang racket

(define l1 (list 0.88 0.56 0.78 1.2 4.5 0.7))

(define l2 (list 1 2 3 4 5))

(define (dollar-store? aList)
  (cond
    [(empty? aList) true]
    [else
     (and
      (< (first aList) 1)
      (dollar-store? (rest aList)))])
)

(define (dollar-howMany aList)
  (cond
    [(empty? aList) 0]
    [(< (first aList) 1) (+ (dollar-howMany (rest aList)) 1)]
    [else
     (dollar-howMany (rest aList))]) 
)

(define (dollar-howManyPrices aList)
  (cond
    [(empty? aList) 0]
    [else
      (+ (dollar-howManyPrices (rest aList)) 1)])
)

(define (dollar-highest aList)
  
  (cond
    [(empty? aList) 'Empty]
    [(empty? (rest aList)) (first aList)]
    [else
     (if (> (first aList) (dollar-highest (rest aList))) (first aList)
          (dollar-highest (rest aList)))]
    )
  )

(define (convert aList)
  (cond
    [(empty? aList) 'Empty]
    [(empty? (rest aList)) (first aList)]
    [else
     (+ (first aList) (* (convert (rest aList)) 10))]))

(define l3 (list 30 40 30 20 15 10))

(define (hours->wages aList)
  (cond
    [(empty? aList) '()]
    [else
     (cons (* 12 (first aList)) (hours->wages (rest aList)))]))

(define (convert-euro aList)
  (cond
    [(empty? aList) '()]
    [else
     (cons (* 1.10 (first aList)) (convert-euro (rest aList)))
     ]
    )
  )

(define (eliminate-exp aList num)
  (cond
    [(empty? aList) '()]
    [else
     (if (< (first aList) num)
         (cons (first aList) (eliminate-exp (rest aList) num))
         (eliminate-exp (rest aList) num))])
  )

(define-struct ir (name price))

(define irList (list
                (make-ir 'Cheezit 4.77)
                (make-ir 'Crackers 2.00)
                (make-ir 'Goldfish 4.70)
                (make-ir 'Ritz 4.91)
                (make-ir 'ChickenBiskit 4.04)      
                ))

(define (sum-ir aList)
(cond
  [(empty? aList) 0]
  [else
   (+ (ir-price (first aList)) (sum-ir (rest aList)))]))

(define (priceForName aList name)
  (cond
  [(empty? aList) 0]
  [(eq? (ir-name (first aList)) name)
   (format "~A: ~A" (ir-name (first aList)) (ir-price (first aList)))]
  [else
   (priceForName (rest aList) name)]
  ))

(define l4 (list 5.99 3.99 2.99 10.99))
(define l5 (list 5.69 4.29 2.69 10.99))

(define (delta aList bList)
  (cond
    [(empty? aList) '()]
    [else
     (cons (- (first bList) (first aList)) (delta (rest aList) (rest bList)))]))
     
  